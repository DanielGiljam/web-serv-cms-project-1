#!/bin/sh

# This script creates a dedicated user for the web_serv_cms_project_1 database,
# and gives that user all the privileges in the scope of that database.
# Made by Daniel Giljam, 2018-04-12.

# INSTRUCTIONS ON HOW TO RUN THIS SCRIPT (on MacOS or Linux):
# 1. Open a Terminal window/a command prompt in the folder where the script is located
#    or navigate your way there in Terminal/the command prompt by entering the command
#    "cd /path/to/folder/where/script/is".
# 2. Execute the script with the command "sudo ./wscp1-admin-script.sh".
#    (You must confirm with the administrator's/root password that you want to
#    execute the script.)
# 3. In case the above step doesn't work, enter the command
#    "chmod +x wscp1-admin-script.sh", which should allow the script to be treated
#    as an executeable. Then try the second step again.

USERNAME="root"
read -s -p "Type the MySQL root user's password and then hit enter to create wscp1-admin user. " PASSWORD

if [ -n $PASSWORD ]; then
    USERNAME_WITH_FLAG="-u"$USERNAME
    PASSWORD_WITH_FLAG=""
else
    USERNAME_WITH_FLAG="-u"$USERNAME
    PASSWORD_WITH_FLAG="-p"$PASSWORD
fi

mysql $USERNAME_WITH_FLAG $PASSWORD_WITH_FLAG -Bse \
"CREATE DATABASE IF NOT EXISTS \`web_serv_cms_project_1\` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;\
CREATE USER 'wscp1-admin'@'%';\
GRANT USAGE ON \`web_serv_cms_project_1\`.* TO 'wscp1-admin'@'%';\
GRANT ALL PRIVILEGES ON \`web_serv_cms_project_1\`.* TO 'wscp1-admin'@'%' WITH GRANT OPTION;"
