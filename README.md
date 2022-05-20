## Сделано по ТЗ:

https://docs.google.com/document/d/1Qt1bKc0jZgSs1Lgvv4rguGPa_uk8NOCE6jiRUaPW8TM/edit?usp=sharing

## Документация:

Студенты:

GET /api/students
Получить список всех студентов

GET /api/students/{student}
Получить информацию о конкретном студенте

POST /api/students?name={name}&email={email}&class_id={class}
Cоздать студента

PUT /api/students/{student}?name={name}&class_id={class}
Обновить студента

DELETE /api/students/{student}
Удалить студента

Классы:

GET /api/classes
Получить список всех классов

GET /api/classes/{class}
Получить информацию о конкретном классе

POST /api/classes/?title={title}
Cоздать класс

PUT /api/classes/{class}?title={title}
Обновить класс

DELETE /api/classes/{class}
Удалить класс

Лекции:

GET /api/lectures
Получить список всех лекций

GET /api/lectures/{lecture}
Получить информацию о конкретной лекции

POST /api/lectures/?subject={subject}&description={description}
Cоздать лекцию

PUT /api/lectures/{lecture}?subject={subject}&description={description}
Обновить лекцию

DELETE /api/lectures/{lecture}
Удалить лекцию

Учебный план:

GET /api/plans/
Получить все запланированные лекции

GET /api/plans/{class}
Получить учебный план (список лекций) конкретного класса

POST /api/plans/?lecture_id={lecture}&class_id={class}&planned_at={date: 2022-05-21 00:00:00}
Создать учебный план

PUT /api/plans/{plan}?lecture_id={lecture}&class_id={class}&planned_at={date: 2022-05-21 00:00:00}
Обновить учебный план

DELETE /api/plans/{plan}
Удалить запланированную лекцию