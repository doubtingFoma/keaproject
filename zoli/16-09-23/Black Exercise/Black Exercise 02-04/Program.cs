using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_02_04
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("Please tell me your age: ");
            GetAge(Console.ReadLine());

            Console.ReadKey();
        }

        static void GetAge(string StringAge)
        {
            int Age;
            
            if (Int32.TryParse(StringAge, out Age))
            {
                if (Age >= 0)
                {
                    int BirthYear;
                    int ThisYear = DateTime.Now.Year;
                    Console.WriteLine(ThisYear);

                    BirthYear = ThisYear - Age;
                    Console.WriteLine($"Your birth year is (probably) {BirthYear}.");
                }
                else
                {
                    Console.WriteLine("Error, Please try again!");
                    Console.Write("Please tell me your age: ");
                    GetAge(Console.ReadLine());
                }
            }
            else
            {
                Console.WriteLine("Error, Please try again!");
                Console.Write("Please tell me your age: ");
                GetAge(Console.ReadLine());
            }

        }
    }
}
