## ТЗ ##

На php без использование фреймворка (разрешается использовать отдельные пакеты из composer) написать TODOlist с использованием сервисов, репозиториев и DTO
Функциональность: Добавить удалить, отметить как выполнен, вывести весь список. Выложить на github

================================================

К сожалению, данная реализация не верная. Репозиторий в вашей реализации использует слишком много полномочий, а в идеале он должен заниматься лишь записью и чтением сущностей из места хранения. В вашем случае это делает сама сущность, хотя в ней не должно быть такой логики. Также нет сервисов по реализации бизнес логики. Релизация роутера тоже нарушена, у вас роутер это некий бутстрап-файл, в котором прописаны маршруты, в нем нет чёткой структуры и нет возможности добавить что-то в роутер без изменений в бутстрап-файле.
Так же отсутвуют контроллеры для для вызова сервисов.

===============================================

Дополнительная вводная(?): решение должно соответствовать принципам SOLID и DTO. Бизнес логика должна быть реализована сервисами, которые должны вызываться контроллерами. Отдельно выделить роутер приложения с вызовом соответствующих контроллеров(?). 
 
