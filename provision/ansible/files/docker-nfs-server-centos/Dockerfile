FROM geerlingguy/docker-centos8-ansible
RUN yum install -y nfs-utils R-RUnit inotify-tools
RUN mkdir -p /opt/site
VOLUME /opt/site
EXPOSE 111/udp 2049/tcp
