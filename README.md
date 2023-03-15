# UF Value Table and Graph

This is a single page web application that displays a table of historical values of the 'Unidad de Fomento' (UF), a unit of account used in Chile. The application allows the user to perform CRUD operations on the UF values and generates a graph that displays the UF value over time.

## Installation

Before using this application, you need to install XAMPP, CodeIgniter 4, and Bootstrap 5. You also need to create a MySQL database with a single table called 'indicadores' and configure the database connection in the 'app/Config/Database.php' file.

To get started with the application, clone the project from GitHub and run it locally using XAMPP.

## Data Source

The UF value data used in this project was provided by SOLUTORIA SpA through a REST API. Only the UF currency is requested from the API when connected to a MySQL database.

The 'indicadores' table in the database has the following structure:

### Data Type

The 'indicadores' table in the database has the following structure:

``` 
CREATE TABLE indicadores(
   id                    INTEGER  NOT NULL PRIMARY KEY 
  ,nombreIndicador       VARCHAR(37) NOT NULL
  ,codigoIndicador       VARCHAR(14) NOT NULL
  ,unidadMedidaIndicador VARCHAR(10) NOT NULL
  ,valorIndicador        NUMERIC(8,2) NOT NULL
  ,fechaIndicador        DATE  NOT NULL
  ,tiempoIndicador       VARCHAR(30)
  ,origenIndicador       VARCHAR(13) NOT NULL
);
```

An SQL script located in the 'data' folder named 'SQL data and table.sql' contains 1894 entries on an INSERT INTO format. These INSERT statements are provided for reference purposes and should not be used to populate a production database. Instead, you should obtain the data from a reliable data source and ensure that the data is accurate and up-to-date.

## Usage

After you've installed the prerequisites and set up the database connection, you can access the UF value table and perform CRUD operations by clicking on the appropriate buttons. You can also generate a graph by selecting the 'Graph' button and setting the 'from-to' periods to visualize the UF value over time.

## CRUD Operations

Here's a GIF that shows the CRUD operations on the UF Value Table:

![](https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNjViODA0NTc4Nzc0M2MxNDdkNGM4MGQ5OTM3MDRmYjRhNTA2MzdlOSZjdD1n/NiN4blo1eUnzHhP0XF/giphy.gif)

## Chart

Here's a GIF that shows how to generate a Graph with the data on the table:

![](https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNzA0NmVjNDVkOTBlYjI0MmU2OWY4NWI3NzM1ODNkMmQ2YWVkYjI1MiZjdD1n/RPuWJHXQySiiEvZxgG/giphy.gif)

## Contributing

If you would like to contribute to this project, please fork the repository and make your changes. Once you have made your changes, submit a pull request and the project owner will review it.

## Credits

This project was created by @maticou as a programming test for a job application at SOLUTORIA SpA.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
