using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_02_02
{
    class Program
    {
        static void Main(string[] args)
        {

            //Well, this is another solution to the exercise.
            //I didn't use modulus, I used two for loops and some math.
            for (int i = 1; i <= 50; i++)
            {
                for (int j = 0; j < 5; j++)
                {
                    int number = i;
                    Console.Write($"{number} ");
                    i++;
                }
                i--;
                // \t is an escape sequence, it means horizontal tab
                Console.Write($"\t\t{i}\n");
            }


            Console.ReadKey();
        }
    }
}
