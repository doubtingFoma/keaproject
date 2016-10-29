# Database class 3

  - DB schema

    - not supposed to change frequently - schema evolution
    - not the DB itself but how it's structured
    - how we define the database

  - DB state

    - changes a lot
    - the data in the database is its current state

  - Three-schema architecture

    - **External level** - End users (external views)
    - **Conceptual level** - Conceptual schema - we define entities, attributes
    - **Internal level** - Internal schema (stored database) it is used to describe how the data is stored at physical level (you can store integers using 2 or 4 bytes...)

  - DBMS languages

    - a storage definition language(SDL) to specify the internal schema
    - a view definition language (VDL) specifies user views and their mappings to the conceptual schema
    - a data definition language (DDL - data definition language) to define conceptual schema
    - (DML) Data manipulation language
    - DML vs DDL - DDL modifies the schema, DML modifies the DB state

  - Procedural vs declarative

    - Two main types of DMLs
    - procedural (JavaScript - tells the how)
    - declarative (MySQL - tells the what)
    - A high level DML used in a standalone interactive manner is called a query language

  - DB design process

    1. Miniworld
    2. Requirements collection and analysis
    3. Requirements: Functional requirements data requirements

  - Data requirements (DBMS independent)

    1. Conceptual design -> conceptual schema

  - Entity - relationship model

    - Domain
    - Attribute types: atomic attribute (simple attribute), composite attribute - can be further divided to yield smaller components (e.g.: address, street nr. zip code)
    - single-valued: holds a single value of each occurrence of an attribute entity type
    - multi-valued attribute: holds multiple values for each occurrence of attribute entity type
    - derived attribute: represents a value that is derivable from the value attribute of a related attribute or set of attributes

  - UML notation
  - Key as a uniqueness constraint
