using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_03_03
{
    class Program
    {
        static void Main(string[] args)
        {
            //create an empty list
            List<int> Numbers = new List<int> { };
            
            //get 10 numbers
            while (Numbers.Count<10)
            {
                Console.Write("{0}. number: ", Numbers.Count+1);
                int foo;
                //we parse the string, if we can't, we don't do anything, just get a new number
                if (Int32.TryParse(Console.ReadLine(), out foo))
                {
                    //if we can parse it, we push it into the list
                    Numbers.Add(foo);
                }
                
            }

            //we sort it in ascending order
            Numbers.Sort();
            //we change the direction of the array (descending order)
            Numbers.Reverse();

            //output the result
            for (int i = 0; i < Numbers.Count; i++)
            {
                Console.Write($"{Numbers[i]}  ");
            }
            Console.ReadKey();

        }
    }
}
