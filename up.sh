# try to remove all available docker image, start zero
docker rmi $(docker images -a -q)
# Loading all images
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
# update database
docker exec -it xlp_mediawiki php ./maintenance/update.php --quick
