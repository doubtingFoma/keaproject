using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_04_06
{
    class Program
    {
        static void Main(string[] args)
        {
            int[] Numbers;
            Numbers = new int[3];

            //interate through every elemnt of the array and fill it with values
            for (int i = 0; i < Numbers.Length; i++)
            {
                Console.Write($"Number {i + 1}: ");
                while (!Int32.TryParse(Console.ReadLine(), out Numbers[i]))
                {
                    Console.Write($"Number {i + 1}: ");
                }

            }

            string find;
            int whilenum = 0;

            do
            {
                Console.Write("Write 'max' or 'min' to get the highest or the lowest numbers from the array: ");
                find = Console.ReadLine();

                if (find == "max")
                {
                    whilenum = 1;
                }
                else if (find == "min")
                {
                    whilenum = 2;
                }

            } while (whilenum <= 0);


            if (find == "max")
            {
                Console.WriteLine("The largest number is {0}", GetEdge(Numbers, "max"));
            }
            else if (find == "min")
            {
                //we don't pass an argument, so it will pass its default value
                Console.WriteLine("The smallest number is {0}", GetEdge(Numbers));
            }
            else
            {
                //we pass the default value again
                Console.WriteLine("The smallest number is {0}", GetEdge(Numbers));
            }


            Console.ReadKey();
        }

        //when we add a default value to an argument, it becomes optional
        static int GetEdge(int[] Numbers, string find = "min")
        {
            switch (find)
            {
                //if we use return, we don't need the break, because the function already stopped working
                case "max":
                    return Numbers.Max();
                case "min":
                    return Numbers.Min();
                default:
                    //this is neccesary, because VS throws an error when I assign no return to default (even though it will never happen)
                    throw new ArgumentException("Invalid value", "No comment");
            }
        }
    }
}
