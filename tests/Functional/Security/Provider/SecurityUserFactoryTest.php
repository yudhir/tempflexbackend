<?php
declare(strict_types = 1);
/**
 * /tests/Functional/Security/Provider/SecurityUserFactoryTest.php
 *
 * @author TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */

namespace App\Tests\Functional\Security\Provider;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\Provider\SecurityUserFactory;
use App\Security\SecurityUser;
use Generator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\User as CoreUser;
use Throwable;

/**
 * Class SecurityUserFactoryTest
 *
 * @package App\Tests\Integration\Security
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class SecurityUserFactoryTest extends KernelTestCase
{
    /**
     * @var SecurityUserFactory;
     */
    private $securityUserFactory;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @throws Throwable
     */
    public function testThatLoadUserByUsernameThrowsAnExceptionWithInvalidUsername(): void
    {
        $this->expectException(UsernameNotFoundException::class);

        static::assertNull($this->securityUserFactory->loadUserByUsername('foobar'));
    }

    /**
     * @dataProvider dataProviderTestThatLoadUserByUsernameReturnsExpectedUserInstance
     *
     * @param string $username
     * @param array  $roles
     *
     * @throws Throwable
     */
    public function testThatLoadUserByUsernameReturnsExpectedUserInstance(string $username, array $roles): void
    {
        $domainUser = $this->securityUserFactory->loadUserByUsername($username);

        static::assertInstanceOf(SecurityUser::class, $domainUser);
        static::assertSame($roles, $domainUser->getRoles());
    }

    /**
     * @throws Throwable
     */
    public function testThatRefreshUserThrowsAnExceptionIfUserIsNotFound(): void
    {
        $this->expectException(UsernameNotFoundException::class);

        $this->securityUserFactory->refreshUser(new SecurityUser(new User()));

        unset($user);
    }

    /**
     * @throws Throwable
     */
    public function testThatRefreshUserReturnsCorrectUser(): void
    {
        /** @var User $user */
        $user = $this->userRepository->findOneBy(['username' => 'john']);

        static::assertNotNull($user);
        static::assertInstanceOf(User::class, $user);

        $securityUser = new SecurityUser($user);

        /** @noinspection NullPointerExceptionInspection */
        static::assertSame($user->getId(), $this->securityUserFactory->refreshUser($securityUser)->getUsername());

        unset($user);
    }

    /**
     * @throws Throwable
     */
    public function testThatRefreshUserReturnsANewInstanceOfSecurityUser(): void
    {
        /** @var User $user */
        $user = $this->userRepository->findOneBy(['username' => 'john']);

        static::assertNotNull($user);
        static::assertInstanceOf(User::class, $user);

        $securityUser = new SecurityUser($user);

        /** @noinspection NullPointerExceptionInspection */
        static::assertNotSame($securityUser, $this->securityUserFactory->refreshUser($securityUser));

        unset($user);
    }

    /**
     * @throws Throwable
     */
    public function testThatRefreshUserThrowsAnExceptionIfUserClassIsNotSupported(): void
    {
        $this->expectException(UnsupportedUserException::class);
        $this->expectExceptionMessage('Invalid user class "Symfony\Component\Security\Core\User\User"');

        $user = new CoreUser('test', 'password');

        $this->securityUserFactory->refreshUser($user);

        unset($user);
    }

    /**
     * @return Generator
     */
    public function dataProviderTestThatLoadUserByUsernameReturnsExpectedUserInstance(): Generator
    {
        yield ['john', []];
        yield ['john-api', ['ROLE_API', 'ROLE_LOGGED']];
        yield ['john-logged', ['ROLE_LOGGED']];
        yield ['john-user', ['ROLE_USER', 'ROLE_LOGGED']];
        yield ['john-admin', ['ROLE_ADMIN', 'ROLE_USER', 'ROLE_LOGGED']];
        yield ['john-root', ['ROLE_ROOT', 'ROLE_ADMIN', 'ROLE_USER', 'ROLE_LOGGED']];
    }

    protected function setUp(): void
    {
        parent::setUp();

        static::bootKernel();

        $this->securityUserFactory = static::$container->get(SecurityUserFactory::class);
        $this->userRepository = static::$container->get(UserRepository::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->securityUserFactory, $this->userRepository);
    }
}
