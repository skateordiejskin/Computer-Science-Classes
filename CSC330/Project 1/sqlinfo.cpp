//#include <mysql_connection.h>
//#include <cppconn/driver.h>
//#include <cppconn/exception.h>
//#include <cppconn/resultset.h>
//#include <cppconn/statement.h>
//#include <iostream>
//
//using namespace sql;
//
//Driver *driver;
//Connection *con;
//Statement *stmt;
//ResultSet *res;
//
//void connectToMYSQL()
//{
//	try
//	{
//		driver = get_driver_instance();
//		con = driver->connect("tcp://127.0.0.1:8080", "root", "");
//		if(con)
//		{
//			std::cout << "Connected to the DataBase \n\n";
//			con->setSchema("project1");
//		}
//		else
//			std::cout << "Unable to connect to the DataBase \n\n";
//	}
//	catch (SQLException &e) 
//	{
//		std::cout << "# ERR: SQLException in " << __FILE__;
//		std::cout << "(" << __FUNCTION__ << ") on line " << __LINE__ << std::endl;
//		std::cout << "# ERR: " << e.what();
//		std::cout << " (MySQL error code: " << e.getErrorCode();
//		std::cout << ", SQLState: " << e.getSQLState() << " )" << std::endl;
//	}
//}