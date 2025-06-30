pipeline {
	agent any

    stages {

        stage('Run Ansible Playbook') {
			steps {
				sh 'ansible-playbook ./ansible/playbook.yml --extra-vars "env=préprod"'
            }
        }

    }

}