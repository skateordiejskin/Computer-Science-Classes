#include"Course.h"

using namespace std;

Course::Course()
{
	for(int i = 0; i < max; i++)
	{
		courseName[i] = "";
		courseID[i] = "";
		hoursOfCourse[i] = 0;
		courseGrade[i] = 'A';
		courseCredits[i] = 0;
	}
}

Course::Course(int i, string CN, string CI, int HOC, char CG, int CC)
{
	courseName[i] = CN;
	courseID[i] = CI;
	hoursOfCourse[i] = HOC;
	courseGrade[i] = CG;
	courseCredits[i] = CC;
}

//sets and gets course name
void Course::set_courseName(int i, string name)
{
	courseName[i] = name;
}

string Course::get_courseName(int i)
{
	return courseName[i];
}

//sets and gets course ID
void Course::set_courseID(int i, string number)
{
	courseID[i] = number;
}

string Course::get_courseID(int i)
{
	return courseID[i];
}


//sets and gets amount of hours per credit
void Course::set_hoursPerCredit(int i, int hours)
{
	hoursOfCourse[i] = hours;
}

int Course::get_hoursPerCredit(int i)
{
	return hoursOfCourse[i];
}

//sets and gets grade student recieved
void Course::set_courseGrade(int i, char grade)
{
	courseGrade[i] = grade;
}

char Course::get_courseGrade(int i)
{
	return courseGrade[i];
}

//sets and gets amount of credits in the course
void Course::set_courseCredits(int i, int credit)
{
	courseCredits[i] = credit;
}

int Course::get_courseCredits(int i)
{
	return courseCredits[i];
}


//calculate number of credits a student is taking
double Course::numOfCredits(int j)
{
	double credits = 0.00;
	int i;
	for(i = 0; i < j; i++)
		credits = credits + hoursOfCourse[i];

	return credits;
}

//calculates GPA 
double Course::calculate_GPA(int j)
{
	int i;
	for(i = 0; i < j; i++)
	{
		if(courseGrade[i] == 'A')
			gpa += 4.0;
		else if(courseGrade[i] == 'B')
			gpa += 3.0;
		else if(courseGrade[i] == 'C')
			gpa += 2.0;
		else if(courseGrade[i] == 'D')
			gpa += 1.0;
		else if(courseGrade[i] == 'F')
			gpa += 0.0;
	}
	return gpa/i;
}