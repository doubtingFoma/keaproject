using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_06_01
{
    class Program
    {
        static void Main(string[] args)
        {
            Car BMWX5 = new Car();
            //we can set the inherited properties just like normal ones
            BMWX5.Accelerate = 10;
            BMWX5.Decelerate = 12;
            BMWX5.Speed = 200;
            //and execute normal methods, just like inherited ones
            BMWX5.HonkHorn();

            Bicycle Gepida = new Bicycle();
            Gepida.RingBell();

            Console.ReadKey();
        }
        //this is a normal class
        class Vehicle
        {
            public int Speed;
            public int Accelerate;
            public int Decelerate;
        }
        //this is a class that extends the vehicle class. it means, that it gets all of the vehicle's parameters
        class Car : Vehicle
        {
            //this function is not visible to the vehicle class, or the bicycle class.
            public void HonkHorn()
            {
                Console.WriteLine("Honk Honk");
            }
        }
        //another class that extends the vehicle class
        class Bicycle : Vehicle
        {
            //this is not visible to vehicle, or the car 
            public void RingBell()
            {
                Console.WriteLine("Ring Ring");
            }
        }
    }
}
