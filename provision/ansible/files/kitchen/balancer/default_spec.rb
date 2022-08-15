require 'serverspec'

set :backend, :exec

describe package('nginx') do
  it { should be_installed }
end

describe file('/etc/nginx/nginx.conf') do
  it { should contain 'proxy_pass http\:\/\/cluster' }
end

describe service('nginx') do
  it { should be_enabled }
  it { should be_running }
end

describe port(80) do
  it { should be_listening }
end
