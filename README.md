# web-приложение для расчета скоринга клиентов #

### Функционал: ###

* #### Регистрация клиентов через форму: ####
	1.	Имя
	2.	Фамилия
	3.	Номер телефона(только российские)
	4.	Образование(Средние, Специальное, Высшее)
	5.	Галочка (Я даю свое согласие на обработк моих личных данных)


* #### Управление клиентами: ####
    Отображение списка клиентов со скорингом, пагинацией, с возможностью зайти в карточку клиента, редактирования, удаления)
* #### Скоринг: ####
	1.	Скоринг - это число равное сумме баллов по правилам расчета 
	2.	Список правил с баллами:
        * Сотовый оператор:
            * МегаФон - 10 баллов
            * Билайн - 5 
            * МТС - 3
            * Иной - 1
        * Домен Э-почты:
            * gmail - 10
            * yandex - 8
            * mail - 6
            * Иной - 3
        * Образование:
            * Высшее образование - 15
            * Специальное образование - 10
            * Среднее образование - 5
        * Галочка &quot;Я даю согласие на обработку моих личных данных&quot;. 
            * Выбрана - 4
            * Не выбрана - 0
            
* #### Консольная команда по расчету скоринга: ####
    Команда "php bin/console app:scoring". Данная команда работает в двух режимах:
        1.  Рассчитать скоринг по всем клиентам
        2.  Рассчитать скоринг по одному клиенту(принимает в качестве аргументов его id)
   Результатом выполнения команды будет: вывод скоринга с детализацией по правилам в консоль.

### UI: Bootstrap ###
### БД: MySQL ###
### FRAMEWORK: SYMFONY V4.4 ###
### Для заполнения БД тестовыми данными использовался: fzaninotto/Faker ###