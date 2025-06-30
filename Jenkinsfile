pipeline {
	agent any

    stages {

        stage('Run Ansible Playbook') {
			dir('ansible') {
				steps {
					sh 'ansible-playbook ./ansible/playbook.yml --extra-vars "env=préprod"'
				}
			}
        }
    }

}