<?php


namespace App\Security;


use Symfony\Component\Ldap\LdapInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class LdapUserProvider implements UserProviderInterface
{
    private $ldap;

    public function _construct(LdapInterface $ldap){
        $this->ldap = $ldap;
    }


    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @return UserInterface
     *
     * @throws UsernameNotFoundException if the user is not found
     */
    public function loadUserByUsername(string $username)
    {
        try{
            $this->ldap->bind();
        }catch (UsernameNotFoundException $e){

        }
        // TODO: Implement loadUserByUsername() method.
    }

    /**
     * Refreshes the user.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     *
     * @return UserInterface
     *
     * @throws UnsupportedUserException  if the user is not supported
     * @throws UsernameNotFoundException if the user is not found
     */
    public function refreshUser(UserInterface $user)
    {
        // TODO: Implement refreshUser() method.
    }

    /**
     * Whether this provider supports the given user class.
     *
     * @return bool
     */
    public function supportsClass(string $class)
    {
        // TODO: Implement supportsClass() method.
    }
}