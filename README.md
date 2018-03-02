Установка 

1. Установите Virtualbox и Vagrant
2. В консоли перейдите в папку проекта и запустите: vagrant up --provider=virtualbox
3. Подключитесь по ssh к виртуальной машине: vagrant ssh
4. Запустите миграцию ./yii migrate
5. В браузере откройте invoice.test/