#include <iostream>
#include <fstream>
#include <string>

#include "Student.h"
#include "Course.h"
#include "Person.h"

using namespace std;

int main()
{
	//declarations
	Student student[10];
	int total_students, tuition, i, y, studentID, numOfCourses;
	int creditHours[10];
	string firstName, lastname, courseName[10], courseNumber[10], lastName;
	bool isTuitionPaid;
	char grade[10];
	double gpa;

	ifstream inFile; //reads from file
	ofstream outFile; //writes to file

	inFile.open("info.txt");

	if (!inFile) 
	{
		cout << "Can't open input file! " <<endl;
		return 0;
	}

	else 
	{
		inFile >> total_students >> tuition;

		for (i = 0; i < total_students; i++)
		{
			inFile >> firstName >> lastName >> studentID >> numOfCourses >> isTuitionPaid ;

			for(y = 0; y < numOfCourses; y++)
			{
				inFile >> courseName[y] >> courseNumber[y] >> creditHours[y] >> grade[y];
				student[i].set_courseName(y, courseName[y]);
				student[i].set_courseID(y, courseNumber[y]);
				student[i].set_hoursPerCredit(y, creditHours[y]);
				student[i].set_courseGrade(y, grade[y]);
			}

			//sets student information
			student[i].setFirstName(firstName);
			student[i].setLastName(lastName);
			student[i].set_studentID(studentID);
			student[i].set_tuitionPaid(isTuitionPaid);
			student[i].set_numOfClasses(numOfCourses);

		}
		
		//opens "display.txt" for writing
		outFile.open("display.txt");

		for (i = 0; i < total_students; i++)
		{
			outFile << "Student Name: " << student[i].getFirstName() << " " << student[i].getLastName() << endl;
			outFile << "Student ID:  " << student[i].get_studentID() << endl;
			outFile << "Number of courses enrolled: " << student[i].get_numOfClasses() << endl;
			outFile << "Course No. | " << "Course Name | " << "Credits | " << "Grade | " << endl;
			outFile << "Total number of credits: " << student[i].numOfCredits(student[i].get_numOfClasses()) << endl;

			cout << "Student Name: " << student[i].getFirstName() << " " << student[i].getLastName() << endl;
			cout << "Student ID:  " << student[i].get_studentID() << endl;
			cout << "Number of courses enrolled: " << student[i].get_numOfClasses() << endl;
			cout << "Course No. | " << "Course Name | " << "Credits | " << "Grade | " << endl;
			cout << "Total number of credits: " << student[i].numOfCredits(student[i].get_numOfClasses()) << endl;

			if(student[i].get_tuitionPaid() == 1)
			{
				for(y = 0; y < student[i].get_numOfClasses(); y++){

					outFile << student[i].get_courseID(y) <<"      "<< student[i].get_courseName(y);
					outFile <<"        "<< student[i].get_hoursPerCredit(y) <<"          "<< student[i].get_courseGrade(y) << endl;
					cout << student[i].get_courseID(y) <<"      "<< student[i].get_courseName(y);
					cout <<"        "<< student[i].get_hoursPerCredit(y) <<"          "<< student[i].get_courseGrade(y) << endl;
				}
				outFile << "Mid-Semester GPA : " << student[i].calculate_GPA(student[i].get_numOfClasses()) << endl<< endl<<endl <<endl;
				cout << "Mid-Semester GPA : " << student[i].calculate_GPA(student[i].get_numOfClasses()) << endl<< endl<<endl <<endl;

			}
			else
			{
				outFile << "Cost of Bill: " << student[i].numOfCredits(student[i].get_numOfClasses()) * tuition << endl<<endl <<endl;
				cout << "Cost of Bill: " << student[i].numOfCredits(student[i].get_numOfClasses()) * tuition << endl<<endl <<endl;
			}
		}
	}

	cin.sync();
	cin.clear();
	cin.get();
	return 0;
}