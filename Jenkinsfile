pipeline {
	agent any

    stages {

        stage('Run Ansible Playbook') {
            steps {
                dir('ansible') {
                    sh 'ansible-playbook playbook.yml --extra-vars "env=préprod"'
                }
            }
        }
    }

}