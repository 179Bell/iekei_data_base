import { HeroSection } from '@/components/templates/HeroSection';
import { Header } from '@/components/organisms/Header';
import { NextPage } from 'next';
import Head from 'next/head';
import { useFetch } from '@/hooks/useFetch';

const Home: NextPage = () => {
  const { data, isLoading, isError } = useFetch('/api/v1/shops');
  console.log(data, isLoading, isError);
  return (
    <>
      <Head>
        <title>イエケイタベタイ</title>
      </Head>
      <Header />
      <HeroSection />
    </>
  );
};

export default Home;
