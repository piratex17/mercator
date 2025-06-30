pipeline {
	agent any

    stages {

		stage('Checkout') {
			steps {
				git branch: 'master', url:'git@github.com:piratex17/mercator.git'
            }
        }

        stage('Run Ansible Playbook') {
			steps {
				dir('docker-compose') {
					sh 'ansible-playbook ./ansible/playbook.yml --extra-vars "env=préprod"'
                }
            }
        }

    }

}