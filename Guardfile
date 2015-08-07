guard 'coffeescript', :input => 'assets/coffee', :output => 'assets/js/lib'

guard 'compass', :workdir => '', :configuration_file => 'assets/sass/config.rb' do
    watch('^(.*)\.sass')
end

autoupload_opts = {
    :protocol => :sftp,
    :host => "",
    :port => 22,
    :user => "",
    :password => "",
    :remote => "",
    :verbose => true,
    :quiet => false
}

guard 'autoupload', autoupload_opts do
    watch('(main.css|app.js)')
    watch('^(.*)\.(png|jpg|gif|bmp)')
end