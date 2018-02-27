Установка 
1. Установите Virtualbox и Vagrant
2. В консоли передите в папку проекта и запустите vagrant up --provider=virtualbox
3. Поключитесь по ssh к виртуальной машине: vagrant ssh
4. Выполните ./init выбирете Development
5. Запустите миграцию ./yii  migrate
6. В браузере откоройте invoice.dev/