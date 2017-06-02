FROM ubuntu:13.04
MAINTAINER Mikhail Kulygin "mkulygin@gmail.com"
RUN apt-get update
RUN apt-get install -y wget git vim postfix nginx sqlite
RUN apt-get install -y mysql-server mysql-client
RUN apt-get install -y php5-cli php5-common php5-mysql php5-sqlite php5-curl php5-fpm
RUN wget -O /etc/nginx/sites-available/default https://github.com/mkulygin/az_money/blob/master/site.conf
RUN echo "cgi.fix_pathinfo = 0;" >> /etc/php5/fpm/php.ini
RUN echo "daemon off;" >> /etc/nginx/nginx.conf
RUN mkdir /html/public
EXPOSE 80
CMD service php5-fpm start && nginx