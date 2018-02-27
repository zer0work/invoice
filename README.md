Установка 


1. Установите Virtualbox и Vagrant
2. В консоли передире в папку проекта и запустите vagrant up --provider=virtualbox
3. Подключитесь по ssh к виртуальной машине: vagrant ssh
4. Выполните ./init выберете Development
5. Запустите миграцию ./yii migrate
6. В браузере откройте invoice.dev/