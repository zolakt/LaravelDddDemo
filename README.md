Laravel DDD Demo Project

The provided sample code is a small skeleton REST API application. The application manages users and their tasks.

The sample demonstrates a lot of concepts that I consider as "good design practices".

Some key features:

- follows SOLID principles
- embraces DDD concepts
- REST API
- low coupling
- uses dependency injection
- code easy to test and mock
- DAL is fully decoupled and can easily be replaced (a simple in-memory database is used, but it can easily be replaced with any ORM/NoSql/Object DB
- domain objects are mapped to database objects, and vise-versa, in DAL (data structures can differ)
- domain objects are mapped to DTO objects, and vise-versa, in services (data structures can differ)
- "Request-Response" pattern in services
- "Common" components are generic, domain agnostic and can be reused in multiple projects

Note: for simple applications this approach can be made simpler by removing coupling the DAL models to Eloquuent models, and removing the database-to-domain mapping.