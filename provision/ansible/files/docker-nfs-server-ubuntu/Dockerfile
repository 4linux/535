FROM geerlingguy/docker-ubuntu2004-ansible
ENV DEBIAN_FRONTEND noninteractive
RUN apt update -qq && apt install -y nfs-kernel-server runit inotify-tools -qq
RUN mkdir -p /opt/site
VOLUME /opt/site
EXPOSE 111/udp 2049/tcp
