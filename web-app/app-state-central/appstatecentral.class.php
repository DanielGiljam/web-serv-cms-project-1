<?php

# APP STATE CENTRAL -OBJECT
#
# Object containing all the app state information. The information is extracted
# and parsed from the HTTP header at the creation of this object.

include 'bouncer.php';
include 'vault/vault.class.php';
include 'person/person.class.php';

class AppStateCentral {

    private $client_id = '0';
    private $page_title = 'Dating Site';
    private $page_title_domain = 'Dating Site';
    private $page_title_location = null;
    private $theme_href = '/css/theme.css';
    private $script_tags = '';

    private $page_specific_properties = [];

    public function __construct()
    {
        $this->setClientId();
        $this->setPageTitle();
        $this->setThemeHref();
        $this->setScriptTags();
    }

    // functions for setting basic properties

        private function setClientId()
        {
            if (isset($_GET['login-request']) && $_GET['login-request'] === 'true') {
                if (isset($_POST)) {
                    if (!loginClient()) {
                        $this->page_specific_properties['wrong_email_or_password'] = $_POST['email'];
                        $this->client_id = checkClientId();
                    } else {
                        redirect('');
                    }
                } else {
                    redirect('');
                }
            } else if (isset($_GET['terminate-session']) && $_GET['terminate-session'] === 'true') {
                logoutClient();
                redirect('');
            } else {
                $this->client_id = checkClientId();
            }
        }

        private function setPageTitle()
        {
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {
                    case 'person':
                        $this->page_specific_properties[0] = 'person';
                        $this->setPersonPageProperties();
                        break;
                    case 'register':
                        $this->page_specific_properties[0] = 'register';
                        $this->setRegisterPageProperties();
                        break;
                    case 'forgot-password':
                        $this->page_specific_properties[0] = 'forgot-password';
                        $this->page_title_location = 'Forgot Password';
                        $this->page_title = $this->page_title_domain . ' | ' . $this->page_title_location;
                        break;
                    default:
                        $this->page_specific_properties[0] = 'feed';
                        $this->setFeedPageProperties();
                        break;

                }
            } else {
                $this->setUnspecifiedPageProperties();
            }
        }

        private function setThemeHref()
        {
            // TODO: theme setting function comes here...
        }

        private function setScriptTags()
        {
            $login_logout_related_tags =    '<script src="' . getContextRoot() . 'js/toggle-log-in-form.js"></script><script src="' . getContextRoot() . 'js/log-out.js"></script>';
            $reg_form_related_tags = '<script src="' . getContextRoot() . 'js/register-form-validation.js"></script>';
            $google_maps_api = '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDVReW9KtqGqweQhSNFyAqkwMAE25w6RY&callback=initMap"></script><script src="' . getContextRoot() . 'js/google-maps-api.js"></script>';
            switch ($this->page_specific_properties[0]) {
                case 'person':
                    $this->script_tags .= $login_logout_related_tags . $google_maps_api;
                    break;
                case 'register':
                    if (!isset($this->page_specific_properties['reg-sub-finish-code'])) {
                        $this->script_tags .= $reg_form_related_tags;
                    }
                    break;
                case 'forgot-password':
                    break;
                default:
                    $this->script_tags .= $login_logout_related_tags;
                    break;
            }
        }

    // functions for setting page specific properties
    // these functions are called from the setPageTitle() -function

        private function setPersonPageProperties()
        {
            // check if there is a "name" GET key and if there is,
            // check that its value matches an existing person/user,
            // else provide fallback options
            if (isset($_GET['name'])) {
                if ($this->userExists()) {
                    // format "name" value and set the page title property accordingly
                    $this->page_specific_properties['url_name'] = $_GET['name'];
                    $this->page_title_location = $this->page_specific_properties['person']->get('name')->value();
                    $this->page_title = $this->page_title_location . ' at ' . $this->page_title_domain;
                } else {
                    // if "name" value doesn't match an existing person/user,
                    // then following fallback flag is set
                    $this->page_specific_properties['no_such_user'] = true;
                }
            } else if ($this->client_id !== '0') {
                redirect('person/' . Person::getNameUrlEncoded($this->client_id));
            } else {
                redirect('');
            }

            // all person page property "sets" within following if -statement are exclusive to logged in clients
            if ($this->client_id !== '0') {
                $this->page_specific_properties['your_page'] = $this->matchNameWithClientId();

                // all person page property "sets" within following if -statement are exclusive to logged in clients
                // visiting their own person -page
                if ($this->page_specific_properties['your_page'] === true) {

                    // if the GET key "settings" has the value "shown", then the "show settings" property is set to "true"
                    // if the value is something else or the key doesn't exist, then the property is set to "false"
                    if (isset($_GET['settings'])) {
                        if ($_GET['settings'] === 'shown') $this->page_specific_properties['show_settings'] = true;
                    } else {
                        $this->page_specific_properties['show_settings'] = false;
                    }
                }
            }

            // TODO: more person page property "sets" here...
        }

        private function setRegisterPageProperties()
    {
        if (isset($_GET['registration-submitted']) && $_GET['registration-submitted'] === 'true') {
            if (isset($_POST)) {
                $this->page_specific_properties['reg-sub-finish-code'] = processRegSub();
                if ($this->page_specific_properties['reg-sub-finish-code'] === 0) {
                    $this->page_title_location = 'Registration Successful';
                    $this->page_title = $this->page_title_domain . ' | ' . $this->page_title_location;
                } else {
                    $this->page_title_location = 'Registration Failed';
                    $this->page_title = $this->page_title_domain . ' | ' . $this->page_title_location;
                }
            } else {
                redirect('');
            }
        } else {
            $this->page_title_location = 'Register';
            $this->page_title = $this->page_title_domain . ' | ' . $this->page_title_location;
        }
    }

        private function setFeedPageProperties()
        {
            // TODO: feed page property "sets" come here...
        }

        private function setUnspecifiedPageProperties()
        {
            if ($this->client_id !== '0') {
                // TODO: finish unspecifiedPageProperties() -function
            } else {
                $this->page_specific_properties[0] = 'feed';
                $this->setFeedPageProperties();
            }
        }

    // utility functions (tasks) and procedures

        private function userExists()
        {
            // Check if the $_GET['name'] value actually represents
            // a users name in the database's "users" table.
            // Return "true" if it does and "false" otherwise.
            $person = Person::getPerson(new NameUrlEncoded($_GET['name']));
            if ($person !== false) {
                $this->page_specific_properties['person'] = $person;
                return true;
            } else {
                return false;
            }
        }

        private function matchNameWithClientId()
        {
            // Check if the $_GET['name'] value and the client id property
            // (which represents the currently logged in client's user id)
            // are on the same row in the database's "users" table.
            // Return "true" if that is the case and "false" otherwise.
            if ($_GET['name'] === Person::getNameUrlEncoded($this->client_id)) {
                return true;
            } else {
                return false;
            }
        }

    // the object's access points: the public getters

        public function getClientId()
        {
            return $this->client_id;
        }

        public function getPageTitle()
        {
            return $this->page_title;
        }

        public function getPageTitleDomain()
        {
            return $this->page_title_domain;
        }

        public function getPageTitleLocation()
        {
            return $this->page_title_location;
        }

        public function getThemeHref()
        {
            return $this->theme_href;
        }

        public function getScriptTags()
        {
            return $this->script_tags;
        }

        public function getPageSpecificProperties()
        {
            return $this->page_specific_properties;
        }
}