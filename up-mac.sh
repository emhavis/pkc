#! /bin/bash
################################################################################
## Output command usage
function usage {
    local NAME=$(basename $0)
    echo "Usage: $NAME <file>"
    echo "       <file> Host file, listing of installation target server."
}

function prep_nginx {
    # sed -i 's/old-text/new-text/g' input.txt
    echo "Preparing NGINX Config Files ..."
    # 
    sed "s/#GIT_SUBDOMAIN/$GITEA_SUBDOMAIN/g" ./config-template/git.conf > ./config/git.conf
    sed "s/#PMA_SUBDOMAIN/$PMA_SUBDOMAIN/g" ./config-template/pma.conf > ./config/pma.conf
    sed "s/#MTM_SUBDOMAIN/$MTM_SUBDOMAIN/g" ./config-template/mtm.conf > ./config/mtm.conf
    sed "s/#VS_SUBDOMAIN/$VS_SUBDOMAIN/g" ./config-template/vs.conf > ./config/vs.conf
    sed "s/#YOUR_DOMAIN/$YOUR_DOMAIN/g" ./config-template/reverse-proxy.conf > ./config/reverse-proxy.conf
    sed "s/#YOUR_DOMAIN/$YOUR_DOMAIN/g" ./config-template/pkc.conf > ./config/pkc.conf
    echo ""
}

function prep_mw {
    echo "Prepare LocalSettings.php file"
    if [ "$YOUR_DOMAIN" = "localhost" ]; then 
        FQDN="$DEFAULT_TRANSPORT://$YOUR_DOMAIN:$PORT_NUMBER"
    else
        FQDN="$DEFAULT_TRANSPORT://www.$YOUR_DOMAIN"
    fi
    #
    echo "$MTM_SUBDOMAIN"
    sed "s/#MTM_SUBDOMAIN/$MTM_SUBDOMAIN/g" ./config-template/LocalSettings.php > ./config/LocalSettings.php
    sed -i '' "s|#YOUR_FQDN|$FQDN|g" ./config/LocalSettings.php
    #
    cp ./config-template/config.ini.php ./config/config.ini.php
    #
}

function prep_local {
    # 
    # copy LocalSettings.php
    echo "Applying Localhost setting .... "
    cp ./config/LocalSettings.php ./mountpoint/LocalSettings.php
    cp ./config/config.ini.php-local ./mountpoint/matomo/config/config.ini.php
}
################################################################################
## Main
# Preparation
# 
if [ -f .env ]; then
    export $(cat .env | grep -v '#' | awk '/=/ {print $1}')
    if [ "$YOUR_DOMAIN" == "localhost" ]; then {
        GITEA_SUBDOMAIN=$YOUR_DOMAIN:$GITEA_PORT_NUMBER
        PMA_SUBDOMAIN=$YOUR_DOMAIN:$PHP_MA
        MTM_SUBDOMAIN=$YOUR_DOMAIN:$MATOMO_PORT_NUMBER
        VS_SUBDOMAIN=$YOUR_DOMAIN:$VS_PORT_NUMBER
    } else {
        GITEA_SUBDOMAIN=git.$YOUR_DOMAIN
        PMA_SUBDOMAIN=pma.$YOUR_DOMAIN
        MTM_SUBDOMAIN=mtm.$YOUR_DOMAIN
        VS_SUBDOMAIN=code.$YOUR_DOMAIN
    }
    fi
    # Displays installation plan
    echo "--------------------------------------------------------"
    echo "Installation Plan:"
    echo "Ansible script to install on host file: $1"
    echo ""
    echo "Loaded environmental variable: "
    echo "Port number for Mediawiki: $PORT_NUMBER"
    echo "Port number for Matomo Service: $MATOMO_PORT_NUMBER"
    echo "Port number for PHPMyAdmin: $PHP_MA"
    echo "Port number for Gitea Service: $GITEA_PORT_NUMBER"
    echo "Port number for Code Server: $VS_PORT_NUMBER"
    echo ""
    echo ""
    read -p "Press [Enter] key to continue..."
    echo "--------------------------------------------------------"
else
    echo ".env files not found, please provide the .env file"
    exit 1;
fi
# Display execution time
date
#
#
# Pre-Requisite, install docker
docker info | grep -q docker-desktop && echo "Docker is found, not installing..." || brew install --cask docker
# 
# prepares config file
# 1. NGINX Config Files
# read -p "Prep nginx Press [Enter] key to continue..."
# prep_nginx
# 2. LocalSettings.php files
echo "Prep mw Press [Enter] key to continue..."
echo ""
echo ""
prep_mw
#
# is this localhost implementation?
echo "$YOUR_DOMAIN"
if [ "$YOUR_DOMAIN" == "localhost" ]; then
    # copy files to cs folder
    prep_local
fi
#
echo "Continue to install all docker images"
echo ""
echo ""
#
# try to remove all available docker image, start zero
# docker rmi $(docker images -a -q)
# Loading all images
read -p "Press [Enter] to Load Images..."
docker load -i ./docker-image/xlp_codeserver.tar.gz
docker load -i ./docker-image/xlp_gitea.tar.gz
docker load -i ./docker-image/xlp_mariadb.tar.gz
docker load -i ./docker-image/xlp_matomo.tar.gz
docker load -i ./docker-image/xlp_mediawiki.tar.gz
docker load -i ./docker-image/xlp_phpmyadmin.tar.gz
#
#
# Bring up the system
docker-compose up -d
#
read -t 5 -p "Wait 5 second until mySQL is Ready ..."
docker exec -it xlp_mediawiki php ./maintenance/update.php --quick
#
echo "Installation completed"
# display login information
echo "---------------------------------------------------------------------------"
echo "Installation is complete, please read below information"
echo "To access MediaWiki [localhost:$PORT_NUMBER], please use admin/xlp-admin-pass"
echo "To access Gitea [localhost:32030], please register user, first user to register is the admin"
echo "To access Matomo [localhost:$MATOMO_PORT_NUMBER], please use user/bitnami"
echo "To access phpMyAdmin [localhost:$PHP_MA], please use Database: database, User: root, password: secret"
echo "To access Code Server [localhost:$VS_PORT_NUMBER], please use password: $VS_PASSWORD"
echo ""
echo "---------------------------------------------------------------------------"

# display finish time
date