//Assignment#7
//CSC 326 Section 9138
//Joe Skinner
//main.cpp

#include <iostream>
#include <conio.h>
#include <string>
#include <stack>

using namespace std;

void main()
{
	string input, contAnswer;
	char value;
	int operand1, operand2, number, length, i, result;
	stack<int> operandStack;
	bool keepGoing= true;

	cout<<"Welcome to the Postfix Calculator."<<endl<<endl;

	while (keepGoing == true)
	{
		cout<<"Please enter a Postfix expression with spaces in-between each character."
			<<endl;
		cout<<"(Example. 3+5 is 3 5 +)"<<endl;

		getline(cin, input);

		cout<<endl;

		length=input.length();

		for(i=0;i<length;i++)
		{
			value = input[i];

			if(value >='0' && value <='9')
			{
				number = value - '0';
				operandStack.push(number);
			}

			else if (value == ' ')
			{
			}

			else
			{	
				switch(value)
				{
				case '+':
					operand1=operandStack.top();
					operandStack.pop();
					operand2=operandStack.top();
					operandStack.pop();
					result = operand1 + operand2;
					operandStack.push(result);
					break;
				case '-':
					operand1=operandStack.top();
					operandStack.pop();
					operand2=operandStack.top();
					operandStack.pop();
					result = operand1 - operand2;
					operandStack.push(result);
					break;
				case '*':
					operand1=operandStack.top();
					operandStack.pop();
					operand2=operandStack.top();
					operandStack.pop();
					result = operand1 * operand2;
					operandStack.push(result);
					break;
				case '/':
					operand1=operandStack.top();
					operandStack.pop();
					operand2=operandStack.top();
					operandStack.pop();
					result = operand1 / operand2;
					operandStack.push(result);
					break;
				}
			}
		}
		cout << result << endl;
		cout<<endl;
		cout << "Do you wish to continue?(y or n) " << endl;
		getline(cin,contAnswer);

		if (contAnswer == "y"|| contAnswer == "Y")
		{
			input.empty();
			cout<<endl;
		}
		else
		{
			keepGoing = false;
			cout<<endl;
		}
	
	}
	cout<< "Press enter to continue!";
	_getch();
}