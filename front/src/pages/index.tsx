import { HeroSection } from '@/components/templates/HeroSection';
import { Header } from '@/components/organisms/Header';
import { NextPage } from 'next';
import Head from 'next/head';
import { Card, Box, Heading, Text, CardBody } from '@chakra-ui/react';
import { axiosApi } from '@/libs/axios';
import { useQuery } from 'react-query';
import { Loading } from '@/components/templates/Loading';
import { Flex } from '@chakra-ui/react';

type shopCardProps = {
  shop: string;
  index: string;
};

const Home: NextPage = () => {
  const { data, isLoading } = useQuery('shops', () => {
    const response = axiosApi.get('/api/v1/shops');
    return response;
  });

  if (isLoading) return <Loading />;
  const shops = data.data['data'];

  return (
    <>
      <Head>
        <title>イエケイタベタイ</title>
      </Head>
      <Header />
      <HeroSection />
      <Flex justifyContent="center">
        <Box w={{ sm: '90%', md: '60vw' }} pt="20px">
          {shops.map(({ shop, index }: shopCardProps) => (
            <Card mt="2" key={index} _hover={{ bgColor: 'gray.300' }} cursor="pointer">
              <CardBody>
                <Heading size="md">{shop.shop_name}</Heading>
                <Text pt="2" fontSize="sm">
                  {shop.prefecture}
                </Text>
              </CardBody>
            </Card>
          ))}
        </Box>
      </Flex>
    </>
  );
};

export default Home;
