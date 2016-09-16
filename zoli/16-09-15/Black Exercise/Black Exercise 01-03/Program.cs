using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_01_03
{
    class Program
    {
        static void Main(string[] args)
        {
          
            char myChar = 'a';
            string myString = "This is a test test";

            Console.WriteLine($"Is the char uppercase? {Char.IsUpper(myChar)}");
            Console.WriteLine($"Is the char a digit? {Char.IsDigit(myChar)}");
            Console.WriteLine($"Change the char to uppercase {Char.ToUpper(myChar)}");

            Console.WriteLine();
            //look for the first occurence of letter "a" and store its position
            int first = myString.IndexOf("a");
            //look for the last occurence of the word "test and store its position
            int last = myString.LastIndexOf("test");
            
            Console.WriteLine($"Change to uppercase {myString.ToUpper()}");
            Console.WriteLine($"Change to lowercase {myString.ToLower()}");
            Console.WriteLine($"Find first a at position: {first}");
            Console.WriteLine($"Find last test at position: {last}");

            Console.WriteLine();
            int myInt = int.MaxValue;
            Console.WriteLine($"The max value of int is {myInt}");
            myInt = int.MinValue;
            Console.WriteLine($"The max value of int is {myInt}");


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
