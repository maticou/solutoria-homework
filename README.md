# UF Value Table and Graph

This is a single page web application that shows a table of historical values of the 'Unidad de Fomento' (UF) currency in Chile. The application allows the user to perform CRUD operations on the UF values, and also generates a graph that displays the UF value over time.

## Getting Started

To use this application, you will need to have XAMPP installed on your machine, and a MySQL database with a single table called 'indicadores'. You will also need to have CodeIgniter 4 and Bootstrap 5 installed.

Once you have these prerequisites, you can clone the project from GitHub and run it locally using XAMPP. You will need to configure the database connection in the 'app/Config/Database.php' file.

## Data Source

The data used in this project was provided by SOLUTORIA SpA from a REST API. The JSON response from the API contained more data than needed, so only the UF currency is requested from the application when connected to MySQL database.

The structure of the 'indicadores' table in the database can be checked on the Model of the app (since it uses the MVC architecture).

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

Also, there is an SQL script located in the 'data' folder named 'SQL data and table.sql' which contains 1894 entries on an INSERT INTO format.

Please note that these INSERT statements are only provided for reference purposes and should not be used to populate a production database. Instead, you should obtain the data from a reliable data source and ensure that the data is accurate and up-to-date.

## Usage

Once the application is running, you can access the UF value table and perform CRUD operations by clicking on the appropriate buttons. You can also generate a graph by selecting the 'Graph' button and setting the 'from-to' periods to visualize the UF value over time.

## Contributing

If you would like to contribute to this project, please fork the repository and make your changes. Once you have made your changes, submit a pull request and the project owner will review it.

## Credits

This project was created by SOLUTORIA SpA as a programming test for job candidates.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
