#include <iostream>
#include "StudentType.h"
#include "CourseType.h"
#include "PersonType.h"
#include <string>
using namespace std;

StudentType::StudentType() : PersonType()
{
	studentID = 0;
	numOfCourses = 0;
	gpa = 0;
	paidTuition = '*';
}

// NOT FINISHED
StudentType::StudentType(string ID, int nc, double grp, char paid) : PersonType()
{
}

void StudentType::setStudentID(int ID)
{
	studentID = ID;
}

void StudentType::setNumOfCourses(int nc)
{
	numOfCourses = nc;
}

double calculateGPA()
{
	// NOT FINISHED
}

