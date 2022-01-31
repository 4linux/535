require 'serverspec'

set :backend, :exec

describe package('apache2') do
  it { should be_installed }
end

describe file('/var/www/html/include/banco.php') do
  it { should contain 'Cloud not connect to mysql' }
end

describe service('apache2') do
  it { should be_enabled }
  it { should be_running }
end

describe port(80) do
  it { should be_listening }
end
