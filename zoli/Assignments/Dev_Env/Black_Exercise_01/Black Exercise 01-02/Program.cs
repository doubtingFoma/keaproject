using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_01_02
{
    class Program
    {
        static void Main(string[] args)
        {
            float myFloat = 1f * (0.5f - 0.4f - 0.1f );
            double myDouble = 1d * (0.5d - 0.4d - 0.1d);
            decimal myDecimal = 1m * (0.5m - 0.4m - 0.1m);

            //Fast, but sucks (Base 2)
            Console.WriteLine(myFloat);
            Console.WriteLine(myDouble);
           
            //Precise but slow (Base 10)
            Console.WriteLine(myDecimal);

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
