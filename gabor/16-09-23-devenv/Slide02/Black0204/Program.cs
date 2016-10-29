using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0204
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Hi, please enter your age: ");
            bool validNumber = false;
            int userAgeInt;
            do
            {
                
                string userAge = Console.ReadLine().ToString();
                validNumber = Int32.TryParse(userAge, out userAgeInt);
                validNumber = userAgeInt > 0;
                if (!validNumber)
                {
                    Console.WriteLine("Please provide your real age with a number. Try again: ");
                }


            } while (!validNumber);
            int currentYear = DateTime.Now.Year;
            int birthYear = currentYear - userAgeInt;
            Console.WriteLine("You were born in " + birthYear);

        }
    }
}
