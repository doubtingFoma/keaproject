using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0103
{
    class Program
    {
        static void Main(string[] args)
        {
            int myInt = 0;
            char myChar = 'a';
            string myString = "This is a test test";

            bool isTheCharUppercase = char.IsUpper(myChar);
            bool isTheCharADigit = char.IsDigit(myChar);
            bool isTheCharALetter = char.IsLetter(myChar);
            char myCharTopped = char.ToUpper(myChar);

            Console.WriteLine($"is the char uppercase? {isTheCharUppercase}");
            Console.WriteLine($"is the char a digit? {isTheCharADigit}");
            Console.WriteLine($"is the char a letter? {isTheCharALetter}");
            Console.WriteLine($"change the char to uppercase {myCharTopped}");

            string myStringUppercase = myString.ToUpper();
            string myStringLowercase = myString.ToLower();
            int firstA = myString.IndexOf("a");
            int lastTest = myString.LastIndexOf("test");
            int maxInt = int.MaxValue;
            int minInt = int.MinValue;

            Console.WriteLine($"change to uppercase {myStringUppercase}");
            Console.WriteLine($"change to lowercase {myStringLowercase}");
            Console.WriteLine($"found last test at position: {lastTest}");
            Console.WriteLine($"The max value of int is: {maxInt}");
            Console.WriteLine($"The min value of int is: {minInt}");




        }
    }
}
