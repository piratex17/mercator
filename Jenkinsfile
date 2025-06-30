pipeline {
	agent any

    stages {

        stage('Run Ansible Playbook') {
			steps {
				dir('docker-compose') {
					sh 'ansible-playbook ./ansible/playbook.yml --extra-vars "env=préprod"'
                }
            }
        }

    }

}