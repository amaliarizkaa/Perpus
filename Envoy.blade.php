@servers(['web' => 'nura@159.223.64.222'])

@story('deploy')
    clone_code
    build
@endstory

@task('clone_code')
    git clone https://github.com/arthurmorgan2/portal-berita-man.git ~/deploy-app
@endtask

@task('build')
    cd ~/deploy-app && docker-compose up --build -d
@endtask
