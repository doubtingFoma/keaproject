using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_04_02
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
            Console.Write("Write your age: ");

            int age;
            //if we can't parse the age value, or it is less than 0, we keep asking for it
            while (!Int32.TryParse(Console.ReadLine(), out age) || age < 0)
            {
                Console.Write("Write your age: ");
            }

            Console.Write("Write your job: ");
            string job = Console.ReadLine();

            Console.WriteLine();
            
            //We call the getfullname method, get the full name as a string, and call the printpersoninfo method
            PrintPersonInfo(GetFullName(FN, LN), age, job);            

            Console.ReadKey();
        }

        static string GetFullName(string FirstName, string LastName)
        {
            //(Challenge) Creating a stringbuilder
            StringBuilder FullName = new StringBuilder();

            //adding new text to the stringbuilder (just like in an array)
            FullName.Append(FirstName);
            FullName.Append(" ");
            FullName.Append(LastName);

            //returning and converting the full name as a string
            return FullName.ToString();
        }

        static void PrintPersonInfo(string Name, int Age, string Job)
        {
            string article;
            //al the vowels (capitalized as well) in the english language
            string vowels = "aeiouAEIOU";

            //if we can't find the first letter of the job in the vowels string, the article is "a", otherwise "an".
            if (vowels.IndexOf(Job[0]) == -1)
            {
                article = "a";
            }
            else
            {               
                article = "an";
            }
            //write the message
            Console.WriteLine($"My name is {Name}, I am {Age} years old, and I am {article} {Job}.");
        }
    }
}
