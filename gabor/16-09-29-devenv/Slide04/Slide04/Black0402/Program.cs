using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0402
{
    class Program
    {
        static void Main(string[] args)
        {
            // User input
            Console.WriteLine("Enter first name...");
            string firstName = Console.ReadLine();
            Console.WriteLine("Enter last name...");
            string lastName = Console.ReadLine();
            Console.WriteLine("Enter your age...");
            int age = Int32.Parse(Console.ReadLine());
            string name = GetFullName(firstName, lastName);
            Console.WriteLine("Enter your job...");
            string job = Console.ReadLine();
            

            // Output user information
            PrintPersonalInfo(name, age, job);
        }

        // Method for creating full name
        static string GetFullName(string string1, string string2)
        {
            StringBuilder sb = new StringBuilder();
            sb.Length = 0;
            sb.Append(string1);
            sb.Append(" ");
            sb.Append(string2);
            return sb.ToString();
        }

        // Method for printing personal info out
        static void PrintPersonalInfo(string name, int age, string job)
        {
            string vowels = "aeiouAEIOU";
            string article = "an";

            // If the first character of job is in the vowels string
            if (vowels.IndexOf(job[0]) == -1)
            {
                article = "a";
            } 

            Console.WriteLine($"My name is {name}, I am {age} years old, I am {article} {job}");
        }
    }
}
