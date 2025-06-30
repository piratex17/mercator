pipeline {
	agent any

    stages {

        stage('Run Ansible Playbook') {
			dir('ansible') {
				steps {
					sh 'ansible-playbook playbook.yml --extra-vars "env=préprod"'
				}
			}
        }
    }

}