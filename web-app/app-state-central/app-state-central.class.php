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
    private $theme_href = '/css/theme.css';
    private $script_tags = ''; // TODO: setScriptTags() -function!

    private $page_specific_properties = [];

    public function __construct()
    {
        $this->setClientId();
        $this->setPageTitle();
        $this->setThemeHref();
    }

    // functions for setting basic properties

        private function setClientId()
        {
            if (isset($_GET['terminate-session']) && $_GET['terminate-session'] === 'true') {
                logoutClient();
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
                        $this->page_title .= ' | Register';
                        break;
                    case 'forgot-password':
                        $this->page_specific_properties[0] = 'forgot-password';
                        $this->page_title .= ' | Forgot Password';
                        break;
                    default:
                        $this->page_specific_properties[0] = 'feed';
                        $this->setFeedPageProperties();
                        break;

                }
            } else {
                $this->page_specific_properties[0] = 'feed';
                $this->setUnspecifiedPageProperties();
            }
        }

        private function setThemeHref()
        {
            // TODO: theme setting function comes here...
        }

    // functions for setting page specific properties

        private function setPersonPageProperties()
        {
            // check if there is a "name" GET key and if there is,
            // check that its value matches an existing person/user,
            // else provide fallback options
            if (isset($_GET['name'])) {
                if ($this->userExists()) {
                    // format "name" value and set the page title property accordingly
                    $this->page_specific_properties['url_name'] = $_GET['name'];
                    $this->page_title = $this->page_specific_properties['person']->get('name')->value() . ' | ' . $this->page_title;
                } else {
                    // if "name" value doesn't match an existing person/user,
                    // then following fallback flag is set
                    $this->page_specific_properties['no_such_user'] = true;
                }
            } else if ($this->client_id !== '0') {
                header('Location: ' . getContextRoot() . 'person/' . Person::getUrlEncodedName($this->client_id));
            } else {
                header('Location: ' . getContextRoot());
            }

            // all person page property "sets" within following if -statement are exclusive to logged in clients
            if ($this->client_id !== '0') {
                $this->page_specific_properties['your_page'] = $this->matchNameWithId();

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

        private function setFeedPageProperties()
        {
            // TODO: feed page property "sets" come here...
        }

        private function setUnspecifiedPageProperties()
        {
            // TODO: unspecified page property "sets" come here...
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

        private function matchNameWithId()
        {
            // Check if the $_GET['name'] value and the client id property
            // (which represents the currently logged in client's user id)
            // are on the same row in the database's "users" table.
            // Return "true" if that is the case and "false" otherwise.
            if ($_GET['name'] === Person::getUrlEncodedName($this->client_id)) {
                return true;
            } else {
                return false;
            }
        }

    // the object's access points: the public getters

        public function getPageTitle()
        {
            return $this->page_title;
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