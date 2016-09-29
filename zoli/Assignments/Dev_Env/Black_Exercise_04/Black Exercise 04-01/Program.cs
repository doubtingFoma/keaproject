using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_04_01
{
    class Program
    {
        static void Main(string[] args)
        {
            //Getting the first name and save it into a variable
            Console.Write("Write your first name: ");
            string FN = Console.ReadLine();
            //same with the last name
            Console.Write("Write your last name: ");
            string LN = Console.ReadLine();

            //We use the GetFullName method as a variable, because it returns a value.
            //So we execute the method at the same time we write the message.
            Console.WriteLine($"The full name is {GetFullName(FN, LN)}");

            Console.ReadKey();
        }

        static StringBuilder GetFullName(string FirstName, string LastName)
        {
            //(Challenge) Creating a stringbuilder
            StringBuilder FullName = new StringBuilder();

            //adding new text to the stringbuilder (just like in an array)
            FullName.Append(FirstName);
            FullName.Append(" ");
            FullName.Append(LastName);

            //returning the full name that can be displayed
            return FullName;
        }
    }
}
