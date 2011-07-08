<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * File Auth driver.
 * [!!] this Auth driver does not support roles nor autologin.
 *
 * @package    Kohana/Auth
 * @author     Kohana Team
 * @copyright  (c) 2007-2010 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Kohana_Auth_ORM extends Auth {


    /**
     * Constructor loads the user list into the class.
     */
    public function __construct($config = array())
    {
        parent::__construct($config);

        // Load user list
        $this->_users = Arr::get($config, 'users', array());
    }

    /**
     * Logs a user in.
     *
     * @param   string   username
     * @param   string   password
     * @param   boolean  enable autologin (not supported)
     * @return  boolean
     */
    protected function _login($user, $email, $password) {

        
    }

    /**
     * Forces a user to be logged in, without specifying a password.
     *
     * @param   mixed    username
     * @return  boolean
     */
    public function force_login($username)
    {
        // Complete the login
        return $this->complete_login($username);
    }

    /**
     * Get the stored password for a username.
     *
     * @param   mixed   username
     * @return  string
     */
    public function password($username)
    {
        return Arr::get($this->_users, $username, FALSE);
    }

    /**
     * Compare password with original (plain text). Works for current (logged in) user
     *
     * @param   string  $password
     * @return  boolean
     */
    public function check_password($password)
    {
        $username = $this->get_user();

        if ($username === FALSE)
            {
                return FALSE;
            }

        return ($password === $this->password($username));
    }

} // End Auth File