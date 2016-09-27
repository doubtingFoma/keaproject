using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_01_05
{
    class Program
    {
        //Creating an enumeration
        //This is a const value but with multiple attributes.
        //Its value cannot be changed during the program, it's hardcoded!
        //Basically a constant object...
        enum Month
        {
            //These are the attributes, that also have a value attached to them (however, this is not essential)
            January = 1,
            February = 2,
            March = 3,
            April = 4,
            May = 5,
            June = 6,
            July = 7,
            August = 8,
            September = 9,
            October = 10,
            November = 11,
            December = 12
        }
        static void Main(string[] args)
        {
            //we get the name of June which is (surprisingly) June
            Month exampleMonth = Month.June;
            //we get the value of june, which is 6
            int exampleMonthValue = (int)Month.June;
            //We write the name and the value of the month we wanted to get
            Console.WriteLine($"The Value of {exampleMonth} is {exampleMonthValue}.");
            
            //waiting for a simple key press, to prevent the automatic
            //close of the program, so that we can see the "Hello World" message.
            //It's not neccessary, but the dialog will disappear and the program
            //will stop running after executing the "WriteLine" function.
            //Alternatively you can run the code with CTRL+F5 (sorry Mac people,
            //I don't know and I don't care what you should press), so you don't 
            //have to write this here. But please note, that CTRL+F5 runs the code WITHOUT
            //the debugger!!!!!!
            Console.ReadKey();
        }
    }
}
