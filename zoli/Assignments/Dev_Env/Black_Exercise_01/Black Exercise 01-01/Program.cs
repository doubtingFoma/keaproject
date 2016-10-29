﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_01_01
{
    class Program
    {
        static void Main(string[] args)
        {
            //This is a string
            string name = "Rune";
            //this is an integer number
            int age = 10;
            //this is a double type number, 64-bit floating-point values, Maximum 15 digits
            double rate = 11.5D;
            
            //this is a float type number, 32-bit floating-point values, Maximum 7 digits
            float test = 11.5F;

            //Simple string that writes 3 variables concatinated in the string
            //In the string you have to write {0} to display the first variable,
            //and {1} for the second, {2} for the 3rd, {3] for the 4th, etc.
            //You write the variables in the correct order, separated by commas.
            Console.WriteLine("Name: {0}, Age: {1}, Rate: {2}$", name, age, rate);

            //this is a second solution where you don't put numbers in curly brackets, 
            //but the actual variable name. This way, you ALWAYS have to put a dollar sign ($)
            //before the string itself, to turn on the variables. Without it, it will output
            //the variable names, instead of their values
            Console.WriteLine($"Name: {name}, Age: {age}, Rate: {rate}$");

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
