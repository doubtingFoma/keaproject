using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_01_04
{
    class Program
    {
        static void Main(string[] args)
        {
            double myDouble = 333333.33333;
            //trying to convert the double value to an integer
            int myInt = (int)myDouble;
            //trying to convert the double value to a short
            short myShort = (short)myDouble;
            
            Console.WriteLine(myDouble);
            Console.WriteLine(myInt);
            Console.WriteLine(myShort);

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
